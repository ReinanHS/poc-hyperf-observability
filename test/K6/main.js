import http from 'k6/http';
import {check} from 'k6';

export const options = {
    stages: [
        {duration: '10s', target: 100},
        {duration: '10s', target: 200},
        {duration: '10s', target: 500},
    ],
    userAgent: 'K6/main',
};
export default function () {
    const res = http.get('http://app:9501/');
    check(res, {
        'is status 200': (r) => r.status === 200,
    });
};