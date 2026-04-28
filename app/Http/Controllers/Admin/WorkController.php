<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Work;
use App\Models\Category;
use App\Models\Genre;
use App\Models\Cast;
use App\Models\Maker;
use App\Models\Country;
use App\Models\Award;
use App\Models\Subscription;


class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return view('admin.works.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $genres = Genre::all();
        // $ages = Age::all();
        $casts = Cast::all();
        $makers = Maker::all();
        $countries = Country::all();
        $awards = Award::all();
        $subscriptions = Subscription::all();

        return view('admin.works.create', compact(
            'categories',
            'genres',
            // 'ages',
            'casts',
            'makers',
            'countries',
            'awards',
            'subscriptions'
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->only([
            'work_name',
            'category_id',
            'release_year',
            'image_path',
            'genre_id',
            'maker_id',
            'country_id',
        ]);

        // 画像
        if ($request->hasFile('image_path')) {
            $data['image_path'] = $request->file('image_path')->store('movies', 'public');
        }

        // 配給会社
        if ($request->maker_name) {
            $maker = Maker::where('name', $request->maker_name)->first();

            if (!$maker) {
                $maker = Maker::create([
                    'name' => $request->maker_name
                ]);
            }

            $data['maker_id'] = $maker->id;
        }

        $work = Work::create($data);

        // キャスト
        if ($request->cast_names) {
            foreach ($request->cast_names as $name) {

                $cast = Cast::where('name', $name)->first();

                if (!$cast) {
                    $cast = Cast::create([
                        'name' => $name
                    ]);
                }

                $work->castMembers()->attach($cast->id);
            }
        }
        // if ($request->cast_name) {
        //     $cast = Cast::where('name', $request->cast_name)->first();

        //     if (!$cast) {
        //         $cast = Cast::create([
        //             'name' => $request->cast_name
        //         ]);
        //     }
        //     $work->castMembers()->attach($cast->id);
        // }

        // 賞
        if ($request->award_ids) {
            $work->awards()->attach($request->award_ids);
        }

        // サブスク
        if ($request->subscription_ids) {
            $work->subscriptions()->attach($request->subscription_ids);
        }
        return redirect('/admin/works/create')->with('success', '登録完了しました。');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
