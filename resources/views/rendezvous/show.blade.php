@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="details-container">
            <h2 class="page-title">Détails du Rendez-vous</h2>
            <div class="details-card">
                <p><strong>Date et Heure :</strong> {{ $rdv->Date_heure_ }}</p>
                <p><strong>Patient :</strong> {{ $rdv->nom_patient_ }}</p>
                <p><strong>Médecin :</strong> {{ $rdv->nom_medecin_ }}</p>
                <p><strong>Secrétaire :</strong> {{ $rdv->nom_secretaire_ }}</p>
                <p><strong>Acte :</strong> {{ $rdv->nom_acte_ }}</p>
            </div>
            <a href="{{ route('appointments.index') }}" class="btn btn-secondary">Retour à la liste des rendez-vous</a>
        </div>
    </div>

    <!-- CSS spécifique à cette vue -->
    <style>
        .page-title {
            color: #343a40;
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 20px;
        }

        .details-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .details-card {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border: 1px solid #e0e0e0;
        }

        .details-card p {
            font-size: 18px;
            margin-bottom: 15px;
        }

        .details-card strong {
            color: #007bff;
        }

        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
            color: #ffffff;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 8px;
            transition: background-color 0.3s, border-color 0.3s;
            text-decoration: none;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #545b62;
        }

        .btn-secondary:focus {
            box-shadow: 0 0 0 0.2rem rgba(108, 117, 125, 0.5);
        }
    </style>
@endsection
