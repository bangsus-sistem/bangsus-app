<template>
    <bsb-screen>
        <template v-slot:mobile>
            <div class="flasher-mobile-wrapper">
                <slot></slot>
            </div>
        </template>
        <template v-slot:desktop>
            <div class="flasher-desktop-wrapper">
                <slot></slot>
            </div>
        </template>
    </bsb-screen>
</template>