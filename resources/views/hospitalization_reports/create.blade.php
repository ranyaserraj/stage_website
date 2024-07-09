\@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Hospitalization Report</h1>
    <form action="{{ route('hospitalization-reports.store') }}" method="POST">
        @csrf
        @include('form')
    </form>
</div>
<div class="mt-4">
    @if (isset($hospitalizationReport))
        <a href="{{ route('hospitalization-reports.generatePdf', ['id' => $hospitalizationReport->id]) }}" class="btn btn-secondary">Télécharger PDF</a>
    @endif
</div>
@endsection

