<div>
    <section id="form">
        <div class="container">

            <h3 class="form__title">
                Account Details
            </h3>

            <div class="form_wrapper_duplicate">
                <div class="form__group" x-data="{ isEditing: false, focus: function() { const firstNameInput = this.$refs.firstNameInput; firstNameInput.focus(); firstNameInput.select(); } }" x-cloak>
                    <label for="first_name">{{ __('First Name') }}</label>
                    <div x-show=!isEditing>
                        <input value="{{ $firstName }}" x-on:click="isEditing = true; $nextTick(() => focus());">
                    </div>

                    <div x-show=isEditing>
                        <form wire:submit.prevent="save">
                            <input id="first_name" type="text" name="first_name" x-ref="firstNameInput" wire:model.lazy="first_name" x-on:keydown.enter="isEditing = false" x-on:keydown.escape="isEditing = false">
                            <p class="subtitle-success"><strong>Enter to save, Esc to cancel</strong></p>
                        </form>
                    </div>

                    @error('first_name')
                        <p class="error-message"><strong>{{ $message }}</strong></p>
                    @enderror
                </div>

                <div class="form__group" x-data="{ isEditing: false, focus: function() { const lastNameInput = this.$refs.lastNameInput; lastNameInput.focus(); lastNameInput.select(); } }" x-cloak>
                    <label for="last_name">{{ __('Last Name') }}</label>
                    <div x-show=!isEditing>
                        <input value="{{ $lastName }}" x-on:click="isEditing = true; $nextTick(() => focus());">
                    </div>

                    <div x-show=isEditing>
                        <form wire:submit.prevent="save">
                            <input id="last_name" type="text" name="last_name" x-ref="lastNameInput" wire:model.lazy="last_name" x-on:keydown.enter="isEditing = false" x-on:keydown.escape="isEditing = false">
                            <p class="subtitle-success"><strong>Enter to save, Esc to cancel</strong></p>
                        </form>
                    </div>

                    @error('last_name')
                        <p class="error-message"><strong>{{ $message }}</strong></p>
                    @enderror
                </div>

                <div class="form__group" x-data="{ isEditing: false, focus: function() { const emailInput = this.$refs.emailInput; emailInput.focus(); emailInput.select(); } }" x-cloak>
                    <label for="email">{{ __('Email Address') }}</label>
                    <div x-show=!isEditing>
                        <input value="{{ $emailAddress }}" x-on:click="isEditing = true; $nextTick(() => focus());">
                    </div>

                    <div x-show=isEditing>
                        <form wire:submit.prevent="save">
                            <input id="email" type="email" name="email" x-ref="emailInput" wire:model.lazy="email" x-on:keydown.enter="isEditing = false" x-on:keydown.escape="isEditing = false">
                            <p class="subtitle-success"><strong>Enter to save, Esc to cancel</strong></p>
                        </form>
                    </div>

                    @error('email')
                        <p class="error-message"><strong>{{ $message }}</strong></p>
                    @enderror
                </div>

                <div class="form__group" x-data="{ isEditing: false, focus: function() { const contactInput = this.$refs.contactInput; contactInput.focus(); contactInput.select(); } }" x-cloak>
                    <label for="contact_number">{{ __('Contact Number') }}</label>
                    <div x-show=!isEditing>
                        <input value="{{ $contactNumber }}" x-on:click="isEditing = true; $nextTick(() => focus());">
                    </div>

                    <div x-show=isEditing>
                        <form wire:submit.prevent="save">
                            <input id="contact_number" type="text" name="contact_number" x-ref="contactInput" wire:model.lazy="contact_number" x-on:keydown.enter="isEditing = false" x-on:keydown.escape="isEditing = false">
                            <p class="subtitle-success"><strong>Enter to save, Esc to cancel</strong></p>
                        </form>
                    </div>

                    @error('contact_number')
                        <p class="error-message"><strong>{{ $message }}</strong></p>
                    @enderror
                </div>

                <div class="form__group form__group__full" x-data="{ isEditing: false, focus: function() { const addressInput = this.$refs.addressInput; addressInput.focus(); addressInput.select(); } }" x-cloak>
                    <label for="address">{{ __('Address') }}</label>
                    <div x-show=!isEditing>
                        <input value="{{ $oldAddress }}" x-on:click="isEditing = true; $nextTick(() => focus());">
                    </div>

                    <div x-show=isEditing>
                        <form wire:submit.prevent="save">
                            <input id="address" type="text" name="address" x-ref="addressInput" wire:model.lazy="address" x-on:keydown.enter="isEditing = false" x-on:keydown.escape="isEditing = false">
                            <p class="subtitle-success"><strong>Enter to save, Esc to cancel</strong></p>
                        </form>
                    </div>

                    @error('address')
                        <p class="error-message"><strong>{{ $message }}</strong></p>
                    @enderror
                </div>
            </div>
        </div>
    </section>
</div>
