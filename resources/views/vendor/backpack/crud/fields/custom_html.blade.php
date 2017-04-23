<!-- used for heading, separators, etc -->
<div @include('crud::inc.field_wrapper_attributes') >
	<!-- {!! $field['value'] !!} -->
	<label>{!! $field['label'] !!}</label>
    @include('crud::inc.field_translatable_icon')
    <?php $entity_model = $crud->getModel(); ?>
    
    <label> Ukuran Tersedia </label>
    <div class="form-group"  >
        <div class="radio">
            <label>
                <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" onClick="displayForm(this)" checked>
                     Tidak tersedia
            </label>
        </div>
        <div class="radio">
            <label>
                <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2" onClick="displayForm(this)">
                      Tersedia
            </label>
        </div>
    </div>
    <div class="row">
        @foreach ($field['model']::all() as $connected_entity_entry)
            <div class="col-sm-4">
                <div class="checkbox">
                  <label>
                    <input type="checkbox"
                      name="{{ $field['name'] }}[]"
                      value="{{ $connected_entity_entry->getKey() }}"

                      @if( ( old( $field["name"] ) && in_array($connected_entity_entry->getKey(), old( $field["name"])) ) || (isset($field['value']) && in_array($connected_entity_entry->getKey(), $field['value']->pluck($connected_entity_entry->getKeyName(), $connected_entity_entry->getKeyName())->toArray())))
                             checked = "checked"
                      @endif > {!! $connected_entity_entry->{$field['attribute']} !!}
                       <input
			            type="text"
			            name="{{ $field['name'] }}"
			            value="{{ old($field['name']) ? old($field['name']) : (isset($field['value']) ? $field['value'] : (isset($field['default']) ? $field['default'] : '' )) }}"
			            @include('crud::inc.field_attributes')
			        >
			        @if(isset($field['suffix'])) <div class="input-group-addon">{!! $field['suffix'] !!}</div> @endif
			    @if(isset($field['prefix']) || isset($field['suffix'])) </div> @endif
                  </label>
                </div>
            </div>
        @endforeach
    </div>

    {{-- HINT --}}
    @if (isset($field['hint']))
        <p class="help-block">{!! $field['hint'] !!}</p>
    @endif
</div>