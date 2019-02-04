<?php

return [
    'alipay'    => [
        'app_id'        => '2016092300578727',

        'ali_public_key' => 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAm9vu3fDHFb2n8XSBFqizbUDuuYvi+Cxu2vZJmXOWxm1btUQ7tBR1C/NLibiGdACSgskzlm3PKvLE2mQPdFtFjiGppdsP0GEI/KRIOqJ6ztUvDT42Y+hOQSAWW5qQoPsDuDgrrCX9FWTSwOrQLE6U2dI5h5kzR+WkpXmjX2Wl9+bop0U2XzzjiGCyY9fRyEvkwauzmsWzeSIRnbMXKgy/BNaw/ymq1E2oOGYOrrAxsnMtfndcXR5RYPNAKw875qCTZ+1705on7tn2KDEX1t5a7tEihEzt+zo5/oT5GeLCAs0haFglt0RBzLn4tWJMZS+sAisQoHy9DwuuAwOr6fMt0QIDAQAB',

        'private_key'   => 'MIIEogIBAAKCAQEA49WM/WFHO7iQabyFIrzs4i6ZU8yQI6J3s3DfpAs1lPd6+RNGX2FZi22QhOR6T/Uz9XjQaodTqO2sa/6zuqGGWN34wNlhDDmWBWHOclgo9KA+U05any58G/yURG9CvFWilrLi5OuiqlaUr6/zEOAgdK7cF6G2s83oEbp3L+n79HhsBP+J61Oxjy7aBg748ycr7qM4ql83Ru8s7tEFtD1G99WUPJHITc5eoGaR3aazrRaNn7Z0BPfG8N/1GfPhumoV2YV6GcaVqf5n9cTNX40rPw3pJjslKvyUj41fo9Xew3DIXFEeonGeDxgPqRkHLZ+xxeCTv3/BYbg8IWVMsWiY8wIDAQABAoIBACr8Zq6DxRnad7zLad8lABiorBsodGWUyLrdaASebMyfaN9HqLZkOq3YzTSVmxIs9FGzKrd+suUjeq2hj619vkhUERPpr6rLzqdTTc07HvcQqNG07dosvhPVsu+6gj/gdF20gKSqZLV4wnLnYpfjgZwiRbpbs4n3Jnr50HUE05nLJ4w5zFeXAaBFiCt4vh4GVH27TufLJAQ8/qSmcJLqvuFyHphYTKQ6abK1raQ0yd1FjRgqIPxD/fu0VB55b4BPa0NelAZ6TzkPzZSyEwONQpeo4NQ+wPp5DJ4+vu2ugHOLiy/sT2NNkpnf7JZyBngLlMdMQ/u0GZo9i/MVLPc+R9kCgYEA8j+Z7hQHITJnoOkM8hZqBFs+rR10Gpl4pXWNlSfQVegqbOGJGUcfQpRk4oyfYZcQ8vfU14Hg3xxYzO67v1qx+bsrzvQVzZCHGVdqADTs4WIvMzGB2C7JHAWtEQ9dRE87qi8vpdgdGsKhGeMnbKykXHD8qBh9yiwCE3l91fVCajUCgYEA8MR6kdqVb6UdAnn4CRUVtsK0Yr3XDd3eJzWU51ahiHEkH79th/0ow/NXPtthwKRZvGiV9RLq96dt1w5jbQ6aqE6XyrgUKkSshdMio3op5wE3Oq8lzbx0QCLJEuyOVuBc+lQlkJDrfEqnEM3xgHUOMq0gzdGyX+vrvFzvD59TG4cCgYABsWQX/9fU6Y9D1p0ajAGNqj2T5CLNlMj9DwdARZj1ILw7KpBUtuSHCJZz5tuuSOn7aLP6FZRGuuH7/KcfPTkFL8OsnJQSbbIkATJicfw9zvvZdb0cj6ckJP4CooLaWVtnYxEILax2ZWnOzoGWBtbXNortec5XPVt+W1j/x8kBCQKBgG/fm+Rx4MYDvrsL2Yi+11wYlKDc/TRgR32IlCv6QQyZJePqmwZ5R5vlUkDOx1kwBNJa9nLt22g/z/YBpYljI9HY0wdLCXOqfU+hj5LOjPHdyr/l6nbyfkHe5/d3G5yanBllSB8od4NFXOOeDf1WZsZ9U6TPL0cK5Hqd5CcqLP+5AoGAIFKWk06/NGCqw+r5EeoX85RjSoFqs0Ik3ATCK1fCN+nhsbACjj10Xm3QHO5HTtKDdPh37CjmgTEa2kN8k6O2WlZh6uMdNPsdxd3Jndtw4d7nlUdApCJEzqkIlGsE/JjAuBZaUb4FuPSV4DPf3Do8khsqgXdhN7J1GZMqJsLgmmg=',

        'log'           => [
            'file'      => storage_path('logs/alipay.log'),
        ],
    ],

    'wechat'    => [
        'app_id'        => '',
        'mch_id'        => '',
        'key'           => '',
        'cert_client'   => '',
        'cert_key'      => '',
        'log'           => [
            'file'  => storage_path('logs/wechat_pay.log'),
        ],
    ],
];
