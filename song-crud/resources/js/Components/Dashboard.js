import React, { useEffect, useState } from 'react';
import axios from 'axios';

const Dashboard = () => {
    const [songs, setSongs] = useState([]);

    useEffect(() => {
        fetchSongs();
    }, []);

    const fetchSongs = async () => {
        try {
            const response = await axios.get('/api/songs');
            setSongs(response.data);
        } catch (error) {
            console.error("There was an error fetching the songs!", error);
        }
    };

    return (
        <div>
            <h2>All Songs</h2>
            <ul>
                {songs.map(song => (
                    <li key={song.id}>{song.title} by {song.singer}</li>
                ))}
            </ul>
        </div>
    );
};

export default Dashboard;
