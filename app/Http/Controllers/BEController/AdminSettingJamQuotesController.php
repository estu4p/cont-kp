<?php

namespace App\Http\Controllers\BEController;

use App\Http\Controllers\Controller;
use App\Models\Quotes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AdminSettingJamQuotesController extends Controller
{
    public function quotes()
    {
        $user = auth()->user();
        $quotes = Quotes::where('type', 'quotes_harian')->get();
        $quotes_ulangtahun = Quotes::where('type', 'quotes_ulangtahun')->first();
        return view('admin.setting.quotes', [
            'title' => "Admin - Setting Jam & Quotes",
            'quotes' => $quotes,
            'quotes_ulangtahun' => $quotes_ulangtahun,
            'user' => $user
        ]);
    }

    public function quotesStore(Request $request)
    {
        $data = $request->all();
        try {
            $validator = Validator::make($data, [
                'quotes' => 'required|string',
            ]);
            $validator->validate();
        } catch (ValidationException $e) {
            $errorValidate = $e->validator->errors()->all();
            $errorMessage = implode('<br>', $errorValidate);
            return redirect()->route('admin-setting.quotes')->with('error', $errorMessage);
        }

        try {
            Quotes::create([
                'quote' => $data['quotes'],
                'type' => 'quotes_harian',
            ]);
            return redirect()->route('admin-setting.quotes')->with('success', 'Quotes Berhasil diTambahkan');
        } catch (\Exception $e) {
            $errorMessage = strip_tags($e->getMessage());
            return redirect()->route('admin-setting.quotes')->with('error', $errorMessage);
        }
    }

    public function quotesDelete($id)
    {
        $quotes = Quotes::findOrFail($id);
        try {
            $quotes->delete();
            return redirect()->route('admin-setting.quotes')->with('success', 'Berhasil Menghapus Quotes');
        } catch (\Exception $e) {
            $errorMessage = strip_tags($e->getMessage());
            return redirect()->route('admin-setting.quotes')->with('error', $errorMessage);
        }
    }

    public function quotes_ulangtahun_update(Request $request, $id)
    {
        $data = $request->all();

        try {
            $quotes = Quotes::findOrFail($id);
            $quotes->update([
                'quote' => $data['quotes'],
            ]);
            return redirect()->route('admin-setting.quotes')->with('success', 'Quotes Ulang Tahun Berhasil di Update');
        } catch (\Exception $e) {
            $errorMessage = strip_tags($e->getMessage());
            return redirect()->route('admin-setting.quotes')->with('error', $errorMessage);
        }
    }
}
