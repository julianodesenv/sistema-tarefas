<div class="row">
    <div class="col-md-12">
        <?php
        $varRequired = '';
        $label = isset($label) ? $label : 'Descrição';
        if(isset($required) && $required){
            $varRequired = 'required';
            $label = $label.' *';
        }
        ?>
        {!! Form::label('description', $label) !!}
        {!! Form::textarea('description', null, ['class'=>'form-control ckeditor', $varRequired]) !!}
    </div>
</div>
