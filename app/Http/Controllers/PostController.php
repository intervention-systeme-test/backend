<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $query = Post::with(['user', 'company']);

        // Recherche par titre ou contenu
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%");
            });
        }

        // Filtrer par utilisateur si spécifié
        if ($request->has('user_id')) {
            $query->where('user_id', $request->user_id);
        }

        $posts = $query->orderBy('created_at', 'desc')->get();

        return response()->json($posts);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'company_id' => 'nullable|exists:companies,id',
        ]);

        // Vérifier que la company appartient à l'utilisateur si fournie
        if ($request->company_id) {
            $company = $request->user()->companies()->find($request->company_id);
            if (!$company) {
                return response()->json(['message' => 'Entreprise non trouvée'], 404);
            }
        }

        $post = $request->user()->posts()->create([
            'title' => $request->title,
            'content' => $request->content,
            'company_id' => $request->company_id,
        ]);

        $post->load(['user', 'company']);

        return response()->json($post, 201);
    }

    public function update(Request $request, $id)
    {
        $post = $request->user()->posts()->findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'company_id' => 'nullable|exists:companies,id',
        ]);

        // Vérifier que la company appartient à l'utilisateur si fournie
        if ($request->company_id) {
            $company = $request->user()->companies()->find($request->company_id);
            if (!$company) {
                return response()->json(['message' => 'Entreprise non trouvée'], 404);
            }
        }

        $post->update([
            'title' => $request->title,
            'content' => $request->content,
            'company_id' => $request->company_id,
        ]);

        $post->load(['user', 'company']);

        return response()->json($post);
    }

    public function destroy(Request $request, $id)
    {
        $post = $request->user()->posts()->findOrFail($id);
        $post->delete();

        return response()->json(['message' => 'Publication supprimée avec succès']);
    }
}

