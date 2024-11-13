import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/react';
import React, { useState } from 'react';
import axios from 'axios';

export default function Songs() {
    const [formData, setFormData] = useState({
        title: '',
        singer: '',
        year_release: '',
        genre: ''
    });

    const handleInputChange = (e) => {
        const { name, value } = e.target;
        setFormData({ ...formData, [name]: value });
    };

    const handleSubmit = async (e) => {
        e.preventDefault();
        try {
            // Replace '/api/songs' with the actual route where you handle the POST request
            await axios.post('/api/songs', formData);
            alert('Song added successfully!');
            // Clear form fields after successful submission
            setFormData({
                title: '',
                singer: '',
                year_release: '',
                genre: ''
            });
        } catch (error) {
            console.error("Error adding song:", error);
        }
    };

    return (
        <AuthenticatedLayout
            header={
                <h2 className="text-xl font-semibold leading-tight text-gray-800">
                    Songs
                </h2>
            }
        >
            <Head title="Songs" />
            
            <div className="py-12">
                <div className="mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div className="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                        <div className="p-6 text-gray-900">
                            <h3 className="text-lg font-semibold mb-4">Add a New Song</h3>
                            <form onSubmit={handleSubmit} className="space-y-4">
                                <div>
                                    <label className="block text-sm font-medium text-gray-700">Title</label>
                                    <input 
                                        type="text" 
                                        name="title" 
                                        value={formData.title} 
                                        onChange={handleInputChange} 
                                        className="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                        required
                                    />
                                </div>
                                <div>
                                    <label className="block text-sm font-medium text-gray-700">Singer</label>
                                    <input 
                                        type="text" 
                                        name="singer" 
                                        value={formData.singer} 
                                        onChange={handleInputChange} 
                                        className="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                        required
                                    />
                                </div>
                                <div>
                                    <label className="block text-sm font-medium text-gray-700">Year Release</label>
                                    <input 
                                        type="number" 
                                        name="year_release" 
                                        value={formData.year_release} 
                                        onChange={handleInputChange} 
                                        className="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                        required
                                    />
                                </div>
                                <div>
                                    <label className="block text-sm font-medium text-gray-700">Genre</label>
                                    <input 
                                        type="text" 
                                        name="genre" 
                                        value={formData.genre} 
                                        onChange={handleInputChange} 
                                        className="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                        required
                                    />
                                </div>
                                <div>
                                    <button type="submit" className="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">
                                        Add Song
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
