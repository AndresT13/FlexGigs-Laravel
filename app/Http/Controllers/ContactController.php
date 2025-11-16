<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactoMensaje;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        try {

            // Validar datos
            $validated = $request->validate([
                'nombre'  => 'required|string|max:255',
                'email'   => 'required|email',
                'mensaje' => 'required|string',
                'tipo'    => 'required|string'
            ]);

            // Guardar en la BD
            ContactoMensaje::create([
                'nombre'      => $validated['nombre'],
                'email'       => $validated['email'],
                'tipo'        => $validated['tipo'],
                'mensaje'     => $validated['mensaje'],
                'fecha_envio' => now(),
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Mensaje enviado correctamente.'
            ], 200);

        } catch (\Exception $e) {

            return response()->json([
                'success' => false,
                'message' => 'Error al enviar mensaje.',
                'error'   => $e->getMessage()
            ], 500);
        }
    }
}
