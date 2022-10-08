        <template>
            <app-layout>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Projects
            </h2>


                <div class="py-12">

                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 text-right">




<div>
    <h3>Add a new Project</h3>
    <jet-button @click="
        method = 'post';
        action = route('projects.store')

        ">Add New Project</jet-button>

 <form @submit.prevent="submit">

  <div class="form-group">
    <label for="exampleInputEmail1">Title</label>
    <input v-model="form.title" type="text" class="form-control"  aria-describedby="emailHelp" placeholder="Enter title">

  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Description</label>
    <input v-model="form.description" type="text" class="form-control" placeholder="description">
  </div>

  <select v-model="form.color">
    <option value=" ">Select a Color</option>
    <option v-for="(color,index) in availableColors" :key="index">{{ color }}</option>
  </select>

  <select v-model="form.icon_name">
    <option value=" ">Select an Icon</option>
    <option v-for="(icon,index) in availableIcons" :key="index">{{ icon }}</option>
  </select>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

    <table class="table-auto">
  <thead>
    <tr>
      <th>Index</th>
      <th>Title</th>
      <th>Description</th>
      <th>Color</th>

    </tr>
  </thead>
  <tbody>
    <tr v-for="(project,index) in projects" :key="index">
      <td>{{ project.index }}</td>
      <td>{{ project.title }}</td>
      <td>{{ project.description }}</td>
      <td :class="project.color">{{ project.color }}</td>
      <td><jet-button @click="
        method = 'put';
        action = route('projects.update', [project.id])
        form.title = project.title;
        form.description = project.description;
        form.color = project.color;
        form.icon_name = project.icon_name;
        ">Edit</jet-button></td>


      <td><jet-button
        @click = "
        method = 'delete';
        action= route('projects.destroy', [project.id]);
        submit();">Delete</jet-button></td>
    </tr>
  </tbody>
</table>

                    </div>

                </div>

        </app-layout>
        </template>

        <script>
        import JetButton from '@/Jetstream/Button'
        import AppLayout from '@/Layouts/AppLayout'

        export default {
            components: {
                JetButton,
                AppLayout,
            },
            props: {
                projects: Object,
                availableColors: Object,
                availableIcons: Object
            },
            methods: {
            submit(){
              this.form.submit(this.method, this.action, {
                onSuccess: () => {
                    this.form.reset('title');
                    this.form.reset('description');
                    this.form.reset('color');
                    this.form.reset('icon_name');

                }
              });
            }
        },
        data(){
            return{
                method: null,
                action: null,
                form: this.$inertia.form({
                'title': '',
                'description': '',
                'color': '',
                'icon_name':''
            })
            }

        }
    }
</script>



