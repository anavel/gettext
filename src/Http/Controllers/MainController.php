<?php
namespace ANavallaSuiza\Adoadomin\Gettext\Http\Controllers;

use ANavallaSuiza\Adoadomin\Http\Controllers\Controller;
use Eusonlito\LaravelGettext\Gettext;

class MainController extends Controller
{
    /**
     * Show the form for editing the gettext entries
     *
     * @param  string  $locale
     * @return Response
     */
    public function edit($locale = '')
    {
        $config = $this->getConfig();

        if (empty($locale)) {
            $locale = $config['locales'][0];
        } elseif (! in_array($locale, $config['locales'], true)) {
            return redirect()->route('adoadomin-gettext.edit', $config['locales'][0]);
        }

        Gettext::setConfig($config);

        $entries = Gettext::getEntries($locale);

        $base = base_path();

        foreach ($entries as $entry) {
            $entry->lines = [];
            if (!($references = $entry->getReferences())) {
                continue;
            }

            foreach ($references as $index => $reference) {
                $entry->lines[] = str_replace($base, '', $reference[0].'#'.$reference[1]);
            }
        }

        return view('adoadomin-gettext::pages.edit', [
            'current' => $locale,
            'locales' => $config['locales'],
            'entries' => $entries
        ]);
    }

    /**
     * Update the gettext entries in storage.
     *
     * @param Request $request
     * @param  string  $locale
     * @return Response
     */
    public function update(Request $request, $locale)
    {
        session()->flash('adoadomin-alert', [
            'type'  => 'success',
            'icon'  => 'fa-check',
            'title' => trans('adoadomin-gettext::messages.alert_success_update_title'),
            'text'  => trans('adoadomin-gettext::messages.alert_success_update_text')
        ]);

        return redirect()->route('adoadomin-gettext.edit', $locale);
    }

    protected function getConfig()
    {
        $config = config('gettext');
        $config['storage'] = base_path($config['storage']);

        foreach ($config['directories'] as $key => $directory) {
            $config['directories'][$key] = base_path($directory);
        }

        return $config;
    }
}
