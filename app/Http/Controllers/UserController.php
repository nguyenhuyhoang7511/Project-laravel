<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return "index : Get all user";
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return "create : create user ";
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return "store : Store a new user	";
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return "Show : show the given user with id : " . $id;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return "edit : edit the given user with id : " . $id;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return "update : Update the given user with id : " . $id;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return "destroy : delete user with id : " . $id;
    }
    public function storeUser(Request $request)
    {
        // check admin
        if ($request->is('admin.*')) {
            return "Role Admin";
        }

        // Check request co null hay khong
        if (!$request->filled('name')) {
            return "Request = null";
        }
        $check = "name";
        if ($request->has(!$check)) {
            return "Request has'nt " . $check;
        };

        if (!$request->isMethod('post')) {
            return "This is not method post";
        }

        $urlWithQueryString = $request->fullUrl();
        $host = $request->schemeAndHttpHost();
        $uri = $request->path();
        $name = $request->input('name');
        $value = $request->header('X-Header-Name', 'default');
        $token = $request->bearerToken();
        $ipAddress = $request->ip();

        $data = [
            'value' => $value,
            'token' => $token,
            'ipAddress' => $ipAddress,
            'host' => $host,
            'urlWithQueryString' => $urlWithQueryString,
            'uri' => 'http://' . $uri,
            'input("name")' => $name,
        ];

        $input = [
            'input ' => $input = $request->all(),
            'collection' => $input = $request->collect(),
            'query string' => $name = $request->query('name'),
            'cokki' => $value = $request->cookie('name'),
        ];
        // return [$data, $input];
        return response('Hello World')->cookie(
            'name',
            'value',
        );
    }

    public function collection()
    {
        // $collection = collect([
        //     'usd' => 1400,
        //     'gbp' => 1200,
        //     'eur' => 1000,
        // ]);

        // $ratio = [
        //     'usd' => 1,
        //     'gbp' => 1.37,
        //     'eur' => 1.22,
        // ];

        // return $collection->reduce(function (int $carry, int $value, int $key) use ($ratio) {
        //     return $carry + ($value * $ratio[$key]);
        // });

        // return $data;
        return Http::get('http://example.com/users/1')['name'];
    }
}
