import { useEffect, useState } from "react";
import "./App.css";

function App() {
    const [blogs, setBlogs] = useState([]);

    useEffect(() => {
        const getBlogs = async () => {
            const response = await fetch("http://127.0.0.1:8000/api/blogs");
            const data = await response.json();
            setBlogs(data);
        };
        getBlogs();
    }, []);

    return (
        <div className="App">
            <header className="App-header">
                <h1>Get Blogs</h1>
                {blogs.length > 0
                    ? blogs.map((blog) => {
                          return (
                              <section key={blog.id}>
                                  <h3>{blog.naziv}</h3>
                                  <p>{blog.opis}</p>
                                  <img
                                      src={`/slike/${blog.slika}`}
                                      alt="blog slika"
                                  />
                              </section>
                          );
                      })
                    : null}
            </header>
        </div>
    );
}

export default App;
