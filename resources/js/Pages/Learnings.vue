<template>
  <Head>
    <title>{{ $page.props.title }} - TestPS</title>
  </Head>
  <div class="p-6">
    <Menu/>
  </div>
  <div class="p-6">
    <table class="table-auto border-collapse border border-slate-400"><thead><tr><th class="border border-slate-300 p-2">ID</th><th class="border border-slate-300 p-2">ID и тема урока</th><th class="border border-slate-300 p-2">ID и ФИО студента</th><th class="border border-slate-300 p-2">Оценка</th><th class="border border-slate-300 p-2">ID и ФИО админа (учителя)</th></tr></thead>
      <tbody>
        <tr v-for="learning in learnings.data" v-bind:key="learning.id"><td class="border border-slate-300 p-2">{{ learning.id }}</td><td class="border border-slate-300 p-2">{{ learning.lesson.id }} {{ learning.lesson.title }}</td><td class="border border-slate-300 p-2">{{ learning.student.id }} {{ learning.student.name }}</td><td class="border border-slate-300 p-2">{{ learning.grade }}</td><td class="border border-slate-300 p-2">{{ learning.teacher.id }} {{ learning.teacher.name }}</td></tr>
      </tbody>
    </table>
  </div>
  <pagination :links="learnings.links" />
</template>
<script>
import Pagination from '@/Shared/Pagination'
import Menu from '@/Shared/Menu'
export default {
  name: 'Learnings',
  components: {
    Pagination,
    Menu
  },
  props: {
    learnings: Array,
  },
  data() {
    return {}
  },
  computed: {},
  methods: {},
  mounted() {},
  watch: {}
}
</script>
<style>
</style>