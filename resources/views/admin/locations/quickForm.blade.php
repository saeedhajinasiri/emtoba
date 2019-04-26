{!! form_start($form, ['class' => '', 'id' => 'quickForm']) !!}

{!! form_row($form->state) !!}
{!! form_row($form->title_fa) !!}
{!! form_row($form->title_en) !!}
{!! form_row($form->slug) !!}
{!! form_row($form->slug_fa) !!}
{!! form_widget($form->parent_id) !!}

{!! form_row($form->SaveAndReload) !!}
{!! form_end($form, false) !!}