<div class='row'>
    <form method='POST' id='generate-{{ $entity }}-form' action='/{{ $entity }}/generate'>
        {{ csrf_field() }}
        <div class='form-group'>
            <label class='col-md-3 control-label' for='{{ $entity }}countrange'>Generate More:</label>
            <div class='col-md-6'>
                <input class='form-control' id='{{ $entity }}countrange' type='range' min='{{ $generatorInputs['min'] }}' max='{{ $generatorInputs['max'] }}' step='{{ $generatorInputs['step'] }}' value='{{ $generatorInputs['initValue'] }}'>
            </div>
            <div class="col-md-3">
                <input type='number' name='count' id='{{ $entity }}countrange-value' size='2' min='{{ $generatorInputs['min'] }}' max='{{ $generatorInputs['max'] }}' step='{{ $generatorInputs['step'] }}' value='{{ $generatorInputs['initValue'] }}'>
            </div>
        </div>
        <input class="form-control" type='submit' value='go!' />
    </form>
</div>