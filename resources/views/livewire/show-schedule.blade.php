<div class="w-100">
    <div class="pt-5">
        <form method="post" wire:submit.prevent="create">
            @if(Session::has('error'))
                <div class="row d-flex justify-content-center">
                    <div class="alert alert-danger alert-dismissible fade show w-50" role="alert">
                        <strong>{{ Session::get('error') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif
            @if($errors->all())
                <div class="row d-flex justify-content-center">
                    <div class="alert alert-danger alert-dismissible fade show w-50" role="alert">
                        <strong>{{ $errors->first() }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif
            <div class="row mt-5">
                <div class="input-group mt-3">
                    <div class="col-4 d-flex justify-content-center align-items-center">
                        <h3 class="text-white mx-2">Início: </h3>
                        <input style="width: 50%" class="form-control input-timer {{ $errors->has('begin') ? 'is-invalid' : '' }}" type="time" step="1" name="begin" id="begin" wire:model="begin" placeholder="Ex: 00h30m05s">
                    </div>


                    <div class="col-4 d-flex justify-content-center align-items-center">
                        <h3 class="text-white mx-2">Fim: </h3>
                        <input style="width: 50%" class="form-control input-timer {{ $errors->has('end') ? 'is-invalid' : '' }}" type="time" step="1" name="end" id="end" wire:model="end" placeholder="Ex: 00h30m05s">
                    </div>


                    <div class="col-4 mt-3 mt-lg-0">
                        <div class="align-buttons align-items-center">
                            <label class="form-check-label mx-2" style="color: #fff">
                                Desligada
                            </label>
                            <label class="switch">
                                <input type="checkbox" wire:model="on" name="on">
                                <span class="slider round"></span>
                            </label>
                            <label class="form-check-label mx-2" style="color: #fff">
                                Ligada
                            </label>
                            <button class="btn btn-md btn-secondary mx-3 align-self-center" type="submit">Ativar</button>
                        </div>
                    </div>

                </div>
            </div>
        </form>
    </div>
    <hr>
    <div class="pt-5">
        <div class="row mt-5">
            @foreach ($schedules as $schedule)
            <hr>
            <div class="input-group">
                <div class="col-4 d-flex justify-content-center align-items-center">
                    <h3 class="text-white mx-2">Início - {{$schedule->begin}}</h3>
                </div>


                <div class="col-4 d-flex justify-content-center align-items-center">
                    <h3 class="text-white mx-2">Fim - {{$schedule->end}}</h3>
                </div>


                <div class="col-4 mt-3 mt-lg-0">
                    <div class="align-buttons align-items-center">
                        @if ($schedule->on == "1")
                            <div class="form-check text-white mx-2">
                                <label class="form-check-label" for="">
                                    <h3>Ligada &nbsp;&nbsp;&nbsp;</h3>
                                </label>
                            </div>
                        @else
                            <div class="form-check text-white mx-1">
                                <label class="form-check-label" for="">
                                    <h3>Desligada</h3>
                                </label>
                            </div>
                        @endif
                        <form method="post" wire:submit.prevent="destroy({{ $schedule->id }})">
                            @csrf
                            <button class="btn btn-md btn-secondary mx-3 align-self-center" style="background-color: #2e2e2e; border-color:#2e2e2e; font-size: 18pt" type="submit">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>