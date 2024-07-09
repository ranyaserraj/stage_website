<!-- resources/views/hospitalization_reports/show.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Détails du Rapport d'Hospitalisation</h1>
        <table class="table">
            <tbody>
                <tr>
                    <th scope="row">Nom</th>
                    <td>{{ $hospitalizationReport->name }}</td>
                </tr>
                <tr>
                    <th scope="row">Prénom</th>
                    <td>{{ $hospitalizationReport->surname }}</td>
                </tr>
                <!-- Ajoutez d'autres champs du rapport d'hospitalisation ici -->
            </tbody>
        </table>
        <div class="mt-4">
            <a href="{{ route('hospitalization-reports.generatePdf', ['id' => $hospitalizationReport->id]) }}" class="btn btn-secondary">Télécharger PDF</a>
        </div>
    </div>
@endsection
