<?php
namespace ANavallaSuiza\Adoadomin\Gettext\Http\Controllers;

use ANavallaSuiza\Adoadomin\Http\Controllers\Controller;

class MainController extends Controller
{
    /**
     * Show the form for editing the gettext entries
     *
     * @return Response
     */
    public function edit()
    {
        return view('adoadomin-gettext::pages.edit');
    }

    /**
     * Update the gettext entries in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function update(Request $request)
    {
        session()->flash('adoadomin-alert', [
            'type'  => 'success',
            'icon'  => 'fa-check',
            'title' => trans('adoadomin-gettext::messages.alert_success_update_title'),
            'text'  => trans('adoadomin-gettext::messages.alert_success_update_text')
        ]);

        return redirect()->route('adoadomin-gettext.edit');
    }
}
