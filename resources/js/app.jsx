import React from 'react';
import { createRoot } from 'react-dom/client';

function App(){
  return (<div className="p-8">Welcome to Influentia</div>);
}

createRoot(document.getElementById('app')).render(<App />);
