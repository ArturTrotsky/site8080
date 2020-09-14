<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-body">

                    {{Form::open(['route' => 'admin.poverka.filter'])}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <button class="btn btn-primary">Застосувати фільтр</button>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">

                            {{--Початок фільтру Підрозділи--}}
                            <div class="form-group">
                                <label>{{PODRAZDELENIE}}</label>
                                <select class="form-control select2 select2-danger"
                                        data-dropdown-css-class="select2-danger"
                                        name="podrazdelenie"
                                        type="text">
                                    @if(isset($podrazdelenie->id)) {
                                    <option selected="selected"
                                            value="{{$podrazdelenie->id}}">{{$podrazdelenie->name}}
                                    </option>
                                    } @else
                                        <option selected="selected" value="-1">Всi</option>
                                    @endif
                                    <option value="-1">Всi</option>
                                    @foreach($podrazdelenies->sortBy('name') as $podrazdelenie)
                                        <option value="{{$podrazdelenie->id}}">{{$podrazdelenie->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{--Кінець фільтру Підрозділи--}}

                            {{--Початок фільтру Кабінети--}}
                            <div class="form-group">
                                <label>{{KABINET}}</label>
                                <select class="form-control select2 select2-danger"
                                        data-dropdown-css-class="select2-danger"
                                        name="kabinet"
                                        type="text">
                                    @if(isset($kabinet->id)) {
                                    <option selected="selected"
                                            value="{{$kabinet->id}}">{{$kabinet->name}}
                                    </option>
                                    } @else
                                        <option selected="selected" value="-1">Всi</option>
                                    @endif
                                    <option value="-1">Всi</option>
                                    @foreach($kabinets->sortBy('name') as $kabinet)
                                        <option value="{{$kabinet->id}}">{{$kabinet->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{--Кінець фільтру Кабінети--}}

                        </div>

                        <div class="col-md-6">

                            {{--Початок фільтру Лабораторії--}}
                            <div class="form-group">
                                <label>{{LABORATORY}}</label>
                                <select class="form-control select2 select2-danger"
                                        data-dropdown-css-class="select2-danger"
                                        name="laboratory"
                                        type="text">
                                    @if(isset($laboratory->id)) {
                                    <option selected="selected"
                                            value="{{$laboratory->id}}">{{$laboratory->name}}
                                    </option>
                                    } @else
                                        <option selected="selected" value="-1">Всi</option>
                                    @endif
                                    <option value="-1">Всi</option>
                                    @foreach($laboratories->sortBy('name') as $laboratory)
                                        <option value="{{$laboratory->id}}">{{$laboratory->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{--Кінець фільтру Лабораторії--}}

                            {{--Початок фільтру Бригади--}}
                            <div class="form-group">
                                <label>{{BRIGADE}}</label>
                                <select class="form-control select2 select2-danger"
                                        data-dropdown-css-class="select2-danger"
                                        name="brigade"
                                        type="text">
                                    @if(isset($brigade->id)) {
                                    <option selected="selected"
                                            value="{{$brigade->id}}">{{$brigade->name}}
                                    </option>
                                    } @else
                                        <option selected="selected" value="-1">Всi</option>
                                    @endif
                                    <option value="-1">Всi</option>
                                    @foreach($brigades->sortBy('name') as $brigade)
                                        <option value="{{$brigade->id}}">{{$brigade->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{--Кінець фільтру Бригади--}}

                        </div>
                    </div>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
</section>
