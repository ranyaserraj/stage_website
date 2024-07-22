@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="page-title">Factures des Patients</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nom du Patient</th>
                    <th>Total des Actes</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($factures as $facture)
                    <tr>
                        <td>{{ $facture['appo']->nom_patient_ }}</td>
                        <td>{{ $facture['total'] }} €</td>
                        <td>
                            <a href="{{ route('factures.pdf', $facture['appo']->id) }}" class="btn btn-primary">Télécharger PDF</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
