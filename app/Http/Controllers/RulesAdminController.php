<?php

namespace App\Http\Controllers;

use App\Models\Rule;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule as Rule_;

class RulesAdminController extends Controller
{
    //INDEX RULES ADMIN
    public function rules()
    {
        return view('account.admin.rules', [
            'new' => 0,
            'id' => null,
            'rules' => Rule::get(),
        ]);
    }
    //NEW RULES
    public function rules_new()
    {
        return view('account.admin.rules', [
            'new' => 1,
            'id' => null,
            'rules' => Rule::get(),
        ]);
    }
    //NEW FORM RULES
    public function rules_new_form(Request $request)
    {
        $request->validate([
            'type' => ['required', Rule_::notIn(['Wybierz'])],
            'content' => 'required',
            'order' => 'nullable|integer',
        ]);

        $rule = new Rule();
        $rule->type = $request->type;
        $rule->content = $request->content;
        $rule->order = $request->order;

        $rule->save();

        return view('account.admin.rules', [
            'new' => 0,
            'id' => null,
            'rules' => Rule::get(),
        ]);
    }
    //EDIT RULES
    public function rules_edit($id)
    {
        return view('account.admin.rules', [
            'new' => 0,
            'id' => $id,
            'rules' => Rule::get(),
        ]);
    }
    //EDIT FORM RULES
    public function rules_edit_form(Request $request, $id)
    {
        $request->validate([
            'type' => ['required', Rule_::notIn(['Wybierz'])],
            'content' => 'required',
            'order' => 'nullable|integer',
        ]);

        Rule::where('id', '=', $id)->update([
            'type' => $request->type,
            'content' => $request->content,
            'order' => $request->order,
        ]);

        return view('account.admin.rules', [
            'new' => 0,
            'id' => null,
            'rules' => Rule::get(),
        ]);
    }
    //DELETE RULES
    public function rules_delete($id)
    {
        Rule::where('id', '=', $id)->delete();

        return view('account.admin.rules', [
            'new' => 0,
            'id' => null,
            'rules' => Rule::get(),
        ]);
    }
}
