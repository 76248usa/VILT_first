
<template>
    <Head title="AppsByElsabe" />

    <Section class=" grid grid-cols-2 text-right bg-gray-800 text-gray-300">

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
</Section>
    <div>
        <Section class="
        bg-gray-800
        pt-16
        h-screen
        ">

        <div class="h-2/3 flex flex-wrap content-between pb-36">
            <p class=" border-b-2
        font-bold
        border-gray-400
        pb-3 text-2xl
        text-gray-300
        uppercase">
                My name is Elsabe. I am a software engineer.
                I will be glad to work with you.
            </p>

        </div>

            <div class="flex items-end border-b-2 border-gray-500 pb-2">
                <p class="
                font-bold mr-5 text-gray-500
                text-xl">Want to know more?</p>

                <div class="flex justify-center mt-10">
                    <jet-button class="
                bg-green-400 rounded
                font-bold text-sm
                text-gray-800 hover:bg-green-800"

                @click="contacting = true">

                Let's chat</jet-button>
                </div>
            </div>

            <div class="animate-pulse mt-3 text-gray-300 text-center text-9xl">
                <a href="#skills">&#8675;</a>
            </div>
        </Section>

        <Section id="skills" class="
        bg-gray-200 text-gray-800  h-screen
        ">
            <h2 class="text-5xl font-bold pt-3">Skills</h2>

            <div class="grid grid-cols-2">
                <div v-for="(skill, index) in skills" :key="index">
                    <Skill :background="skill.color">
                        {{ skill.name }}
                    </Skill>
                </div>
            </div>

            <div class="flex justify-center mt-10">
            <jet-button class="
                bg-indigo-800 rounded
                font-bold text-sm
                text-gray-200 hover:bg-indigo-700"

                @click="contacting = true">

                Get in touch</jet-button>
            </div>

        </Section>


        <!--<Section class="bg-gray-600 text-gray-200 h-screen">
            <h2 class="text-6xl font-bold pt-3">Projects</h2>

            <div v-for="(project, index) in projects" :key="index">
                <Project
                    :title="project.title"
                    :description="project.description"
                    :color="project.color"
                >

                </Project>
            </div>

            <div class="flex justify-center mt-10">
                <jet-button class="
                    bg-purple-100
                    rounded
                    font-bold
                    text-sm
                    text-gray-800
                    hover:bg-purple-200"

                    @click="contacting = true"
                >

                </jet-button>
            </div>

        </Section>-->


    <Section class="bg-gray-600 text-gray-200  h-screen">
            <h2 class="text-5xl font-bold pt-3">Projects</h2>

            <div class="grid grid-cols-2">
                <div v-for="(project, index) in projects" :key="index">
                    <Project
                    :title="project.title"
                    :description="project.description"
                    :color="project.color"
                >

        <div
            :class="color"
            class="bg-gray-100 h-10 w-10 rounded-2xl"
        >
            <slot></slot>
        </div>
                    </Project>
           </div>

                <div class="flex justify-center mt-10">
            <jet-button class="
                bg-indigo-800 rounded
                font-bold text-sm
                text-gray-200 hover:bg-indigo-700"

                @click="contacting = true"

                >Get in touch</jet-button>
            </div>

            </div>
        </Section>


        <Section class="
        flex justify-between  bg-gray-800 text-gray-300 text-xl">
            <p class="flex justify-evenly items-center">&copy: AppsByElsabe. All rights reserved.</p>
            <div class="flex justify-evenly items-center">
                <Link href="" class="border-b pb-1 hover:text-gray-50">GitHub</Link>
                <Link href="" class="border-b pb-1 hover:text-gray-50">LinkedIn</Link>
            </div>
        </Section>
    </div>

    <jet-modal :show="contacting" closeable="true" @close="contacting=null">
        <div class="bg-gray-50 shadow-2xl p-8">
            <p class="
        text-gray-600 text-2xl font-extrabold text-center">Please let us know some details</p>

        <form
                class="flex flex-col items-center p-16"
                @submit.prevent="submit"
            >
                <jet-input
                    class="px-5 py-3 w-96 border border-gray-600 rounded"
                    type="email"
                    name="email"
                    placeholder="Your email"
                    v-model="form.email"
                ></jet-input>

                <jet-input-error :message="form.errors.email" />

                <textarea
                    class="px-5 py-3 w-96 border border-gray-600 rounded mt-5"
                    name="message"
                    placeholder="The details :)"
                    v-model="form.message"
                ></textarea>

                <jet-input-error :message="form.errors.email" />

                <jet-button
                    class="px-5 py-3 mt-5 w-96 bg-purple-400 justify-center rounded-xl text-sm"

                >Keep in Touch</jet-button>

            </form>

        </div>

    </jet-modal>

</template>

<script>
    import { defineComponent } from 'vue'
    import { Head,Link } from '@inertiajs/inertia-vue3'
    import JetApplicationMark from '@/Jetstream/ApplicationMark'
    import Section from '@/Components/Section'
    import JetButton from '@/Jetstream/Button'
    import JetModal from '@/Jetstream/Modal'
    import JetInput from '@/Jetstream/Input'
    import Skill from '@/Components/Skill'
    import Project from '@/Components/Project'
    import JetInputError from '@/Jetstream/InputError'

    export default defineComponent({
        components: {
            Head,
            Link,
            JetApplicationMark,
            Section,
            JetButton,
            Skill,
            Project,
            JetModal,
            JetInput,
            JetInputError
        },

        props: {
            canLogin: Boolean,
            canRegister: Boolean,
            skills: Object,
            projects: Object
        },
        data(){
            return {
                contacting: null,
                form: this.$inertia.form({
                    'email': '',
                    'message': ''
                })
            }

        },
        methods: {
            submit(){
                this.form.post(route('contact'));
            }

        }
    })
</script>

