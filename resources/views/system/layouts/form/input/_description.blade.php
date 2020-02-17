<div class="row">
    <div class="col-md-12">
        <?php
        $varRequired = '';
        $varId = $label;
        $label = isset($label) ? $label : 'Descrição';
        if(isset($required) && $required){
            $varRequired = 'required';
            $label = $label.' *';
        }
        if(isset($id) && $id){
            $varId = $id;
        }
        ?>
        {!! Form::label('description', $label) !!}
        {!! Form::textarea('description', null, ['class'=>'form-control', $varRequired, 'id' => $varId]) !!}
    </div>
</div>
