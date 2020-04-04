@extends('layouts.app')

@section('content')
    <div class="container" >
        <div class="row">
            <div class="col-md-12 col-md-offset-2">
                <div class="card">
                    <div class="card-header " style="background-color:#f58258">
                        <h3 class="card-title" >Pesan Antar Pengguna</h3>
                    </div>

                    <div class="card-body" ref="scrollParent">
                        <dw-messages :messages="messages"></dw-messages>
                    </div>
                    <div class="card-footer" style="background-color:#f58258">
                        <dw-form
                            v-on:sent="addMessage"
                            :user="{{ Auth::user() }}"
                        ></dw-form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
