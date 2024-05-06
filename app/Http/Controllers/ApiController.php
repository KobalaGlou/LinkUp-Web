<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
        public function apiJeuxSocieteByName(Request $request){
        $nom = $request->nom;
        try {
            $response = Http::get('http://192.168.120.1:3250/bgg/search?q='.$nom);
            $data = $response->json();
            return response()->json($data);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function apiJeuxVideoByName(Request $request){
        $nom = $request->nom;
        try {
            $response = Http::get('http://192.168.120.1:3250/rawg/search?q='.$nom);
            $data = $response->json();
            return response()->json($data);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function apiFilmByName(Request $request){
        $nom = $request->nom;
        try {
            $response = Http::get('http://192.168.120.1:3250/omdb/search?q='.$nom);
            $data = $response->json();
            return response()->json($data);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function apiBookByName(Request $request){
        $nom = $request->nom;
        try {
            $response = Http::get('http://192.168.120.1:3250/gbooks/search?q='.$nom);
            $data = $response->json();
            return response()->json($data);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function apiBookById(Request $request){
        $id = $request->idGoogleBooks; 
        try {
            $response = Http::get('http://192.168.120.1:3250/gbooks/book/'.$id);
            $data = $response->json();
            return response()->json($data);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }        
    }
       

    public function apiJeuxSocieteById(Request $request){
        $id = $request->id;
        try {
            $response = Http::get('http://192.168.120.1:3250/bgg/game?id='.$id);
            $data = $response->json();
            return response()->json($data);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function apiJeuxVideoById(Request $request){
        $id = $request->id;
        try {
            $response = Http::get('http://192.168.120.1:3250/rawg/game/'.$id);
            $data = $response->json();
            return response()->json($data);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function apiFilmById(Request $request){
        $id = $request->id;
        try {
            $response = Http::get('http://192.168.120.1:3250/omdb/details/'.$id);
            $data = $response->json();
            return response()->json($data);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
