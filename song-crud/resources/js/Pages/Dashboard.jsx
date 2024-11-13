import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/react';
import { useEffect, useState } from 'react';
import axios from 'axios';

export default function Dashboard() {
    const [songs, setSongs] = useState([]);

    // Fetch songs from the API when the component mounts
    useEffect(() => {
        fetchSongs();
    }, []);

    const fetchSongs = async () => {
        try {
            const response = await axios.get('/api/songs');
            setSongs(response.data);
        } catch (error) {
            console.error("Error fetching songs:", error);
        }
    };

    return (
        <AuthenticatedLayout
            header={
                <h2 className="text-xl font-semibold leading-tight text-gray-800">
                    Dashboard
                </h2>
            }
        >
            <Head title="Dashboard" />

            <div className="py-12">
                <div className="mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div className="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                        <div className="p-6 text-gray-900">
                            <h3 className="text-lg font-semibold mb-4">All Songs</h3>
                            {songs.length > 0 ? (
                                <ul>
                                    {songs.map((song) => (
                                        <li key={song.id} className="py-2">
                                            <strong>{song.title}</strong> by {song.singer} ({song.year_release}) - {song.genre}
                                        </li>
                                    ))}
                                </ul>
                            ) : (
                                <p>No songs available. Please add some on the Songs page.</p>
                            )}
                        </div>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
