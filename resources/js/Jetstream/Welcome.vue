<template>
    <Head title="AppsByElsabe" />

    <div class=" grid grid-cols-2 text-right py-10
    px-72 bg-gray-800 text-gray-300">

        <div>
            <jet-application-mark class="h-12 w-auto"></jet-application-mark>
        </div>

    <div v-if="canLogin">
    <Link v-if="$page.props.user" :href="route('dashboard')" class="text-sm-underline">
        Dashboard
    </Link>

    <template v-else>
        <Link :href="route('login')" class="text-base underline">
            Login
        </Link>

        <Link v-if="canRegister" :href="route('register')" class="text-base
        underline place-self-end ml-4">
        Register
        </Link>
    </template>


    </div>
</div>

    <div>
        <section class="
        bg-gray-800
        pt-16
        h-screen
        px-72">
            <p class=" border-b-2
        font-bold
        border-gray-400
        pb-3 text-2xl
        text-gray-300
        uppercase">
                My name is Elsabe. I am a software engineer.
                I will be glad to work with you.
            </p>


        </section>
        <section class="
        bg-gray-200 text-gray-800 px-72 py-10 h-screen
        ">
            <h2 class="text-5xl font-bold pt-3">Skills</h2>

        </section>
        <section class="bg-gray-600 text-gray-200 px-72 py-10 h-screen">
            <h2 class="text-5xl font-bold pt-3">Projects</h2>

        </section>
        <section class="
        flex justify-between py-10 px-72 bg-gray-800 text-gray-300 text-xl">
            <p class="flex justify-evenly items-center">&copy: AppsByElsabe. All rights reserved.</p>
            <div>
                GitHub
                LinkedIn
            </div>
        </section>
    </div>

</template>

<script>
    import { defineComponent } from 'vue'
    import { Head,Link } from '@inertiajs/inertia-vue3'
    import JetApplicationMark from '@/Jetstream/ApplicationMark'

    export default defineComponent({
        components: {
            Head,
            Link,
            JetApplicationMark
        },

        props: {
            canLogin: Boolean,
            canRegister: Boolean
        }
    })
</script>
