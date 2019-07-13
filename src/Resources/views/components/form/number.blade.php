<div class="form-group">
    <label class="form-control-label" for="{{ $field->getId() }}">
        {{ $field->getLabel() }}
    </label>

    <input class="form-control {{ $field->getClass() }}"
           type="{{ $field->getType() }}"
           id="{{ $field->getId() }}"
           name="{{ $field->getName() }}"
           value="{{ $field->getValue() }}"
           min="{{ $field->getMin() }}"
           max="{{ $field->getMax() }}"
           required{{ $field->getRequire() }}
            {{ $field->getAttributes() }}>

    <small id="{{ $field->getId() }}Help" class="form-text text-muted">
        {{ $field->getHelp() }}
    </small>
</div>