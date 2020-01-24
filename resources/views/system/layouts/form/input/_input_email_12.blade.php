<div class="row">
    <div class="col-md-12">
        <?php
        $varRequired = '';
        $label = isset($label) ? $label : 'E-mail';
        if(isset($required) && $required){
            $varRequired = 'required';
            $label = $label.' *';
        }
        {!! Form::label('email', $label) !!}
        ?>
        {!! Form::email('email', null, ['class'=>'form-control', $varRequired, 'maxlength' => 191]) !!}
    </div>
</div>
