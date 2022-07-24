<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Student;
use App\Models\MadinMapel;
use Illuminate\Http\Request;
use App\Models\MadinInstitution;
use App\Models\MadinRombel;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\CssSelector\Node\FunctionNode;

class MadinController extends Controller
{
    public function data($status)
    {
        if ($status === 'aktif') {
            $is_verified = true;
            $title = 'aktif';
        } else {
            $is_verified = false;
            $title = 'belum';
        }

        $items = Student::where('madin_is_verified', $is_verified)->orderBy('madin_institution_id', 'ASC')->paginate(20)->through(function ($item) {
            if ($item->madin_rombel != null) {
                $rombel = $item->madin_rombel->name;
            } else {
                $rombel  = '-';
            }
            return [
                'id' => $item->id,
                'nama' => $item->nama,
                'kelas' => $item->madin_institution->name,
                'rombel' => $rombel,
                'dormitory' => $item->dormitory->name,
                'room' => $item->rooms,
                'edit_url' => URL::route('madin.edit', $item),
            ];
        });

        return Inertia::render('Madin/Index', ['items' => $items, 'title' => $title]);
    }
    public function dataEdit($id)
    {
        dd($id);
    }
    public function mapel()
    {
        return Inertia::render('Madin/MapelIndex', [
            'title' => 'Pelajaran',
            'mapels' => MadinMapel::all()->map(function ($mapel) {
                return [
                    'id' => $mapel->id,
                    'kode_mapel' => $mapel->kode_mapel,
                    'name' => $mapel->name,
                    'edit_url' => URL::route('madin-mapel.edit', $mapel)
                ];
            }),
            'create_url' => URL::route('madin-mapel.create'),
        ]);
    }
    public function mapelPost(Request $request)
    {
        MadinMapel::create(
            $request->validate([
                'kode_mapel' => ['required', 'unique:madin_mapel,kode_mapel'],
                'name' => ['required']
            ]),
        );
        return redirect()->back()->with('message', 'Berhasil');
    }
    public function kelas(MadinInstitution $madin_kelas)
    {
        return Inertia::render('Madin/KelasIndex', [
            'title' => 'Kelas',
            'data' => $madin_kelas->latest()->get()
        ]);
    }
    public function kelasStore(Request $request)
    {
        Validator::make($request->all(), [
            'title' => ['required'],
        ])->validate();

        MadinInstitution::create($request->all());

        return redirect()->back()
            ->with('message', 'Article Created Successfully.');
    }
    public function kelasUpdate(Request $request)
    {
        Validator::make($request->all(), [
            'title' => ['required'],
        ])->validate();

        if ($request->has('id')) {
            // Article::find($request->input('id'))->update($request->all());
            return redirect()->back()
                ->with('message', 'Post Updated Successfully.');
        }
    }
    public function kelasDelete(Request $request)
    {
        $request->id ?
            MadinInstitution::find($request->id)->delete() :
            redirect()->back()
            ->with('errors', 'Somethings goes wrong.');

        return redirect()->back()
            ->with('message', 'Article deleted successfully.');
    }
    public function rombel()
    {
        $rombel = MadinRombel::all()
            ->map(function ($item) {
                if ($jk = $item->students->first()) {
                    $jk = $jk->jenis_kelamin;
                } else {
                    $jk = '';
                }
                return [
                    'id' => $item->id,
                    'name' => $item->name,
                    'kelas' => $item->madin_institution->name,
                    'jumlah' => $item->students->count(),
                    'jk' => $jk
                ];
            });
        return Inertia::render('Madin/RombelIndex', ['title' => 'Rombel', 'rombel' => $rombel]);
    }
    public function rombelShow($id)
    {
        $rombel = MadinRombel::find($id);
        dd($rombel);
    }
    public function rombelEdit($id)
    {
        $rombel = MadinRombel::find($id);
        dd($rombel);
    }
}
