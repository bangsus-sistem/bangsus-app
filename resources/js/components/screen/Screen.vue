<template>
    <div>
        <slot v-if="$isMobile()" name="mobile" />
        <slot v-else name="desktop" />
    </div>
</template>