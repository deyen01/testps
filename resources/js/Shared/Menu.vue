<template>
  <div class="flex space-x-4 mb-4">
    <Link :href="route('homepage')" class="text-gray-700 bg-gray-200 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Главная страница</Link>
    <Link :href="route('users')" class="text-gray-700 bg-gray-200 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Пользователи</Link>
    <Link :href="route('progress')" class="text-gray-700 bg-gray-200 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Прогресс</Link>
    <Link :href="route('lessons')" class="text-gray-700 bg-gray-200 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Уроки</Link>
    <Link :href="route('learnings')" class="text-gray-700 bg-gray-200 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Обучение (пройденные занятия)</Link>
  </div>
</template>
<script>
export default {
  name: 'Menu'
}
</script>