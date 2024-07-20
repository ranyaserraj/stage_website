@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Liste des Rendez-vous</h2>

        <!-- Formulaire de recherche -->
        <form action="{{ route('appointments.index') }}" method="GET" class="mb-3">
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="date_heure">Date et Heure</label>
                    <input type="datetime-local" id="date_heure" name="date_heure" class="form-control" value="{{ request()->input('date_heure') }}">
                </div>
                <div class="form-group col-md-3">
                    <label for="nom_patient">Patient</label>
                    <input type="text" id="nom_patient" name="nom_patient" class="form-control" value="{{ request()->input('nom_patient') }}">
                </div>
                <div class="form-group col-md-3">
                    <label for="nom_medecin">Médecin</label>
                    <input type="text" id="nom_medecin" name="nom_medecin" class="form-control" value="{{ request()->input('nom_medecin') }}">
                </div>
                <div class="form-group col-md-3 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary">Rechercher</button>
                </div>
            </div>
        </form>

        <a href="{{ route('appointments.create') }}" class="btn btn-success mb-3">Ajouter un Rendez-vous</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Date et Heure</th>
                    <th>Patient</th>
                    <th>Médecin</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($appointments as $rdv)
                    <tr>
                        <td>{{ $rdv->Date_heure_ }}</td>
                        <td>{{ $rdv->nom_patient_ }}</td>
                        <td>{{ $rdv->nom_medecin_ }}</td>
                        <td>
                            <a href="{{ route('appointments.show', $rdv->id) }}" class="btn btn-info btn-sm">Voir</a>
                            <a href="{{ route('appointments.edit', $rdv->id) }}" class="btn btn-warning btn-sm">Modifier</a>

                            <!-- Formulaire de suppression -->
                            <form action="{{ route('appointments.destroy', $rdv->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce rendez-vous ?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- CSS spécifique à cette vue -->
    <style>
        /* Fond du formulaire de recherche */
        form {
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* Style du formulaire de recherche */
        .form-row {
            margin-bottom: 20px;
        }

        .form-group label {
            font-weight: bold;
            margin-bottom: 5px;
            color: #333;
        }

        .form-group input,
        .form-group select {
            border-radius: 4px;
            border: 1px solid #ced4da;
        }

        .form-group input:focus,
        .form-group select:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.25);
        }

        /* Style des boutons */
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }

        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
        }

        .btn-success:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }

        .btn-info {
            background-color: #17a2b8;
            border-color: #17a2b8;
        }

        .btn-info:hover {
            background-color: #138496;
            border-color: #117a8b;
        }

        .btn-warning {
            background-color: #ffc107;
            border-color: #ffc107;
        }

        .btn-warning:hover {
            background-color: #e0a800;
            border-color: #d39e00;
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }

        /* Style du tableau */
        .table {
            margin-top: 20px;
            border-collapse: collapse;
        }

        .table thead {
            background-color: #343a40;
            color: #fff;
        }

        .table th,
        .table td {
            padding: 10px;
            text-align: left;
        }

        .table th {
            border-bottom: 2px solid #dee2e6;
        }

        .table td {
            border-bottom: 1px solid #dee2e6;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #f2f2f2;
        }
    </style>
@endsection
