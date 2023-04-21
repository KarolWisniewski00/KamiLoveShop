<?php

namespace App\Http\Controllers;

use App\Models\Policy;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PolicyAdminController extends Controller
{
    //INDEX POLICY
    public function policy()
    {
        return view('account.admin.policy', [
            'new' => 0,
            'id' => null,
            'policy' => Policy::get(),
        ]);
    }
    //NEW POLICY
    public function policy_new()
    {
        return view('account.admin.policy', [
            'new' => 1,
            'id' => null,
            'policy' => Policy::get(),
        ]);
    }
    //NEW FORM POLICY
    public function policy_new_form(Request $request)
    {
        $request->validate([
            'type' => ['required', Rule::notIn(['Wybierz'])],
            'content' => 'required',
            'order' => 'nullable|integer',
        ]);

        $policy = new Policy();
        $policy->type = $request->type;
        $policy->content = $request->content;
        $policy->order = $request->order;

        $policy->save();

        return view('account.admin.policy', [
            'new' => 0,
            'id' => null,
            'policy' => Policy::get(),
        ]);
    }
    //EDIT POLICY
    public function policy_edit($id)
    {
        return view('account.admin.policy', [
            'new' => 0,
            'id' => $id,
            'policy' => Policy::get(),
        ]);
    }
    //EDIT FORM POLICY
    public function policy_edit_form(Request $request, $id)
    {
        $request->validate([
            'type' => ['required', Rule::notIn(['Wybierz'])],
            'content' => 'required|max:255',
            'order' => 'nullable|integer|max:255',
        ]);

        Policy::where('id', '=', $id)->update([
            'type' => $request->type,
            'content' => $request->content,
            'order' => $request->order,
        ]);

        return view('account.admin.policy', [
            'new' => 0,
            'id' => null,
            'policy' => Policy::get(),
        ]);
    }
    //DELETE POLICY
    public function policy_delete($id)
    {
        Policy::where('id', '=', $id)->delete();

        return view('account.admin.policy', [
            'new' => 0,
            'id' => null,
            'policy' => Policy::get(),
        ]);
    }
}
