<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('企業様向け管理画面') }}
        </h2>
    </x-slot>

<!-- CUSTOMIZE-->
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <div class="mb-6 text-2xl font-bold pl-6">
        {{ __('求人') }}
        </div>

        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">

                <div class="flex justify-between items-center mb-6">
                    <span>合同会社Hyakryps</span>
                    <!--企業情報をDBから引っ張れるようにしたい-->
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        {{ __('新しい求人を作成') }}
                        <!--求人作成画面へリンクを渡す-->
                    </button>
                </div>
                 <!--3行目: 3分割のカラム -->
                    <table class="min-w-full divide-y divide-gray-200">
                        <!--<thead class="bg-gray-50 dark:bg-gray-700">-->
                        <!--    <tr>-->
                        <!--        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">-->
                        <!--            カラム1-->
                        <!--        </th>-->
                        <!--        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">-->
                        <!--            カラム2-->
                        <!--        </th>-->
                        <!--        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">-->
                        <!--            カラム3-->
                        <!--        </th>-->
                        <!--    </tr>-->
                        <!--</thead>-->
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200">
                             <!--Data rows -->
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    求人内容
                                    求人内容
                                    求人内容
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    求人内容
                                    求人内容
                                    求人内容
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    求人内容
                                    求人内容
                                    求人内容
                                </td>
                            </tr>
                             <!--... 他のデータ行も同様に追加 ... -->
                        </tbody>
                    </table>

            </div>
        </div>
    </div>
</div>
<!-- CUSTOMIZE-->

    <!--<div class="py-12">-->
    <!--    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">-->
    <!--        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">-->
    <!--            <div class="p-6 text-gray-900 dark:text-gray-100">-->
    <!--                {{ __("求人の作成や編集を行うことが出来ます。") }}-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
</x-app-layout>
