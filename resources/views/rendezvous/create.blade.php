@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="page-title">Ajouter un Rendez-vous</h2>
        <form action="{{ route('appointments.store') }}" method="POST" class="appointment-form">
            @csrf
            <div class="form-group">
                <label for="Date_heure_">Date et Heure :</label>
                <input type="datetime-local" name="Date_heure_" id="Date_heure_" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="nom_patient_">Patient :</label>
                <select name="nom_patient_" id="nom_patient_" class="form-control" required>
                    @foreach ($patients as $patient)
                        <option value="{{ $patient->Nom_p }} {{ $patient->Prenom_p }}">{{ $patient->Nom_p }} {{ $patient->Prenom_p }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="nom_medecin_">Médecin :</label>
                <select name="nom_medecin_" id="nom_medecin_" class="form-control" required>
                    <option value="ranya">Ranya</option>
                    <option value="soumia">Soumia</option>
                    <option value="saad">Saad</option>
                </select>
            </div>
            <div class="form-group">
                <label for="nom_secretaire_">Secrétaire :</label>
                <select name="nom_secretaire_" id="nom_secretaire_" class="form-control" required>
                    <option value="hiba">Hiba</option>
                    <option value="hind">Hind</option>
                    <option value="ahmed">Ahmed</option>
                    <option value="aya">Aya</option>
                </select>
            </div>
            <div class="form-group">
                <label for="nom_acte_">Acte (optionnel) :</label>
                <select name="nom_acte_" id="nom_acte_" class="form-control">
                    <option value="">Sélectionnez un acte</option>
                    @foreach ($actes as $acte)
                        <option value="{{ $acte->description }}">{{ $acte->description }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Ajouter Rendez-vous</button>
        </form>
    </div>

    <!-- CSS spécifique à cette vue -->
    <style>
        .page-title {
            color: #4a4a4a;
            margin-bottom: 30px;
            font-size: 24px;
            font-weight: 600;
        }

        .appointment-form {
            background-color: #f8f9fa;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border: 1px solid #e0e0e0;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-weight: 500;
            color: #495057;
            display: block;
            margin-bottom: 8px;
        }

        .form-group input,
        .form-group select {
            border-radius: 8px;
            border: 1px solid #ced4da;
            padding: 10px;
            width: 100%;
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        .form-group input:focus,
        .form-group select:focus {
            border-color: #80bdff;
            box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.25);
            outline: none;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            color: #fff;
            padding: 12px 20px;
            font-size: 16px;
            border-radius: 8px;
            transition: background-color 0.3s, border-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }

        .btn-primary:focus {
            box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.5);
        }
    </style>
@endsection
