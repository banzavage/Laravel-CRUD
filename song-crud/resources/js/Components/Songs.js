import React, { useState, useEffect } from 'react';
import axios from 'axios';

const Songs = () => {
    const [songs, setSongs] = useState([]);
    const [formData, setFormData] = useState({ title: '', singer: '', year_release: '', genre: '' });

    useEffect(() => {
        fetchSongs();
    }, []);

    const fetchSongs = async () => {
        try {
            const response = await axios.get('/api/songs');
            setSongs(response.data);
        } catch (error) {
            console.error("Error fetching songs!", error);
        }
    };

    const handleInputChange = (e) => {
        const { name, value } = e.target;
        setFormData({ ...formData, [name]: value });
    };

    const addSong = async () => {
        try {
            await axios.post('/api/songs', formData);
            fetchSongs();
            setFormData({ title: '', singer: '', year_release: '', genre: '' }); // Reset form
        } catch (error) {
            console.error("Error adding song!", error);
        }
    };

    const deleteSong = async (id) => {
        try {
            await axios.delete(`/api/songs/${id}`);
            fetchSongs();
        } catch (error) {
            console.error("Error deleting song!", error);
        }
    };

    return (
        <div>
            <h2>Songs Management</h2>
            <form>
                <input type="text" name="title" placeholder="Title" value={formData.title} onChange={handleInputChange} />
                <input type="text" name="singer" placeholder="Singer" value={formData.singer} onChange={handleInputChange} />
                <input type="number" name="year_release" placeholder="Year Release" value={formData.year_release} onChange={handleInputChange} />
                <input type="text" name="genre" placeholder="Genre" value={formData.genre} onChange={handleInputChange} />
                <button type="button" onClick={addSong}>Add Song</button>
            </form>
            <ul>
                {songs.map(song => (
                    <li key={song.id}>
                        {song.title} by {song.singer}
                        <button onClick={() => deleteSong(song.id)}>Delete</button>
                    </li>
                ))}
            </ul>
        </div>
    );
};

export default Songs;
