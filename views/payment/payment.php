<div class="mx-auto flex-1 h-full overflow-x-hidden overflow-y-auto custom-scroll">
    <div class="grid grid-cols-1 md:grid-cols-1 gap-6">
        <div x-data="{ bgColor: 'white' }" class="rounded-lg p-6">
            <div class="shadow-lg rounded-lg mb-16 p-6 bg-white transition duration-300"
                 :style="{ backgroundColor: bgColor }">
                <div class="bg-white rounded-lg shadow-lg p-6 mb-5">
                    <div class="flex flex-wrap justify-between items-center gap-5">
                        <div class="min-w-1/2 mr-12">
                            <div class="text-sm text-gray-600 mb-2">Available Balance</div>
                            <div class="text-3xl font-bold mb-4">$120,680.00</div>
                            <div class="flex gap-4 mb-4">
                                <div class="flex items-center space-x-3 bg-green-50 px-4 py-2 rounded-lg">
                                        <div>
                                            <div class="font-semibold text-lg">$120,680.00</div>
                                            <div class="text-sm text-gray-600">Paid</div>
                                        </div>
                                </div>
                                <div class="flex items-center space-x-3 bg-blue-50 px-4 py-2 rounded-lg">
                                        <div class="w-5 h-5 bg-blue-500 text-white flex items-center justify-center text-xs rounded-full">R</div>
                                        <div>
                                            <div class="font-semibold text-lg">$0.00</div>
                                            <div class="text-sm text-gray-600">Reserved</div>
                                        </div>
                                </div>
                            </div>
                            <div class="flex gap-4">
                                    <button class="bg-white text-green-600 border border-green-600 py-2 px-4 rounded-md text-sm font-medium hover:opacity-90 transition">Fill Out Balance</button>
                                    <button class="bg-blue-600 text-white py-2 px-5 rounded-md text-sm font-medium hover:opacity-90 transition">Approve All</button>
                            </div>
                        </div>

                            <!-- Status Cards -->
                            <div class="flex flex-1 gap-8 overflow-x-auto">

                            <!-- Drafts -->
                                <div class="w-56 bg-blue-600 text-center text-white rounded-lg p-5">
                                    <div class="flex items-center justify-center gap-2 text-sm mb-6">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                            <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/>
                                            <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/>
                                        </svg>
                                    Drafts
                                    </div>
                                    <div class="text-4xl font-bold mb-2">72</div>
                                    <div class="text-sm opacity-80">32 Creators</div>
                                </div>

                                <!-- Pending -->
                                <div class="w-56 bg-yellow-500 text-center text-white rounded-lg p-5">
                                    <div class="flex items-center justify-center gap-2 text-sm mb-6">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <circle cx="12" cy="12" r="10"/>
                                        <polyline points="12 6 12 12 16 14"/>
                                    </svg>
                                    Pending
                                    </div>
                                    <div class="text-4xl font-bold mb-2">122</div>
                                    <div class="text-sm opacity-80">60 Creators</div>
                                </div>

                                <!-- Paid -->
                                <div class="w-56 bg-green-600 text-center text-white rounded-lg p-5">
                                    <div class="flex items-center justify-center gap-2 text-sm mb-6">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                                        <circle cx="12" cy="7" r="4"/>
                                    </svg>
                                    Paid
                                    </div>
                                    <div class="text-4xl font-bold mb-2">96</div>
                                    <div class="text-sm opacity-80">57 Creators</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Invoices Table -->
                    <div class="mt-8">
                        <div class="flex flex-wrap justify-between mb-4 gap-4">
                            <div class="relative flex-1 min-w-[300px]">
                            <div class="absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <circle cx="11" cy="11" r="8"/>
                                <line x1="21" y1="21" x2="16.65" y2="16.65"/>
                                </svg>
                            </div>
                            <input type="text" class="w-full pl-10 py-3 border border-gray-300 rounded-md text-sm" placeholder="Search invoice">
                            </div>
                        </div>

                        <div class="overflow-x-auto shadow-lg rounded-lg mt-5">
                            <table class="w-full table-auto border-collapse">
                                <thead>
                                    <tr class="bg-green-500 text-white text-xs sm:text-sm leading-normal">
                                        <th class="text-left py-3 px-6 text-xl uppercase">Invoice ID</th>
                                        <th class="text-left py-3 px-6 text-xl uppercase">Amount</th>
                                        <th class="text-left py-3 px-6 text-xl uppercase">Date</th>
                                        <th class="text-left py-3 px-6 text-xl uppercase">Creator</th>
                                        <th class="text-left py-3 px-6 text-xl uppercase">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="border-t border-green-200 hover:bg-green-50 transition">
                                        <td class="py-3 px-6  text-gray-800">INV-09876</td>
                                        <td class="py-3 px-6  text-gray-700">$3,200.00</td>
                                        <td class="py-3 px-6  text-gray-700">2025-05-23</td>
                                        <td class="py-3 px-6  text-gray-700">Jane Doe</td>
                                        <td class="py-3 px-6">
                                            <select class="bg-green-100 text-green-700 text-sm font-medium rounded-full px-3 py-1 focus:outline-none">
                                                <option value="draft" selected>Draft</option>
                                                <option value="pending">Pending</option>
                                                <option value="paid">Paid</option>
                                            </select>
                                        </td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
