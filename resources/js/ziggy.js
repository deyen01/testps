const Ziggy = {"url":"http:\/\/testps.deyen","port":null,"defaults":{},"routes":[]};

if (typeof window !== 'undefined' && typeof window.Ziggy !== 'undefined') {
    Object.assign(Ziggy.routes, window.Ziggy.routes);
}

export { Ziggy };
