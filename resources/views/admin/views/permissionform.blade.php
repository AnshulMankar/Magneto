<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css"
      rel="stylesheet">
<section class="content col-md-9">
    @foreach($data as $groupName => $group)
        <div class="panel panel-success col-md-12">
            <div class="panel-heading align-middle"> {{$groupName}}</div>
            @foreach($group as $index => $row)
                <div class="col-md-3">
                    <div class="panel-body">
                        <div class="">
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
</section>

<script>
    $(function () {

        $('.toggle-class').bootstrapToggle();

    });


</script>

