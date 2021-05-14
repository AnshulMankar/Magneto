
<section class="content col-md-12">
    <div class="container">
    @foreach($data as $groupName => $group)
        <div class="panel panel-heading col-md-10">
            <div class="panel-heading align-middle bg-success text-lg-center text-capitalize"> {{$groupName}}</div>
            @foreach($group as $index => $row)
                <div class="col-md-3">
                    <div class="panel-body">
                        <div class="text-capitalize text-lg-center">
                            {{$row['permission_title']}}
                        </div>
                            <div>
                                <input data-id="{{$row['permission_id']}}" class="toggle-class switch"
                                       type="checkbox"
                                       data-onstyle="success" data-offstyle="danger"
                                       data-toggle="toggle" data-on="Active"
                                       data-width="70"
                                       data-off="InActive"
                                    {{ in_array($row['permission_id'], $selected) ? 'checked' : '' }}>
                            </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach
    </div>
</section>

<script>
    $(function () {

        $('.toggle-class').bootstrapToggle();

    });


</script>

