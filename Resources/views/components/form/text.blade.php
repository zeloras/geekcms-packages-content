<div class="form-group">
    <label class="form-control-label" for="{{ $field->getId() }}">
        {{ $field->getLabel() }}
    </label>

    <input class="form-control {{ $field->getClass() }}"
           type="text"
           id="{{ $field->getId() }}"
           name="{{ $field->getName() }}"
           value="{{ $field->getValue() }}"
           required{{ $field->getRequire() }}
            {{ $field->getAttributes() }}
            {{ $field->getDisabled() }}>

    <small id="{{ $field->getId() }}Help" class="form-text text-muted">
        {{ $field->getHelp() }}
    </small>
</div>