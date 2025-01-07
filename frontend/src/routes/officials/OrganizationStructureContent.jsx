import { Card, CardBody, CardText, CardTitle, Col, Row } from 'react-bootstrap';

export default function OrganizationStructureContent({ period }) {
  const dummyOfficials = [
    {
      name: 'Aditya Tri Prasetyo',
      position: 'President',
      email: 'O9HsD@example.com',
      picture:
        'https://cimsa.fk.ugm.ac.id/wp-content/uploads/sites/442/2012/10/FullSizeRender.jpg',
    },
    {
      name: 'Nico Robin',
      position: 'Vice President',
      email: 'WlZ3K@example.com',
      picture:
        'https://cimsa.fk.ugm.ac.id/wp-content/uploads/sites/442/2012/10/FullSizeRender-12.jpg',
    },
    {
      name: 'Aditya Tri Prasetyo',
      position: 'President',
      email: 'O9HsD@example.com',
      picture:
        'https://cimsa.fk.ugm.ac.id/wp-content/uploads/sites/442/2012/10/FullSizeRender.jpg',
    },
    {
      name: 'Nico Robin',
      position: 'Vice President',
      email: 'WlZ3K@example.com',
      picture:
        'https://cimsa.fk.ugm.ac.id/wp-content/uploads/sites/442/2012/10/FullSizeRender-12.jpg',
    },
    {
      name: 'Nico Robin',
      position: 'Vice President',
      email: 'WlZ3K@example.com',
      picture:
        'https://cimsa.fk.ugm.ac.id/wp-content/uploads/sites/442/2012/10/FullSizeRender-12.jpg',
    },
  ];

  const officials = {
    '2025-2026': dummyOfficials,
    '2024-2025': dummyOfficials,
    '2023-2024': dummyOfficials,
    '2022-2023': dummyOfficials,
    '2021-2022': dummyOfficials,
    '2020-2021': dummyOfficials,
    '2019-2020': dummyOfficials,
    '2018-2019': dummyOfficials,
  };

  return (
    <div className='text-center'>
      <h2 className='display-6' style={{ color: 'red', fontWeight: 'bold' }}>
        CIMSA ULM Officials
      </h2>
      <h4 style={{ marginBottom: '14px' }}>{period}</h4>
      <img
        alt='Cimsa ULM Organization'
        // src='https://cimsa.fk.ugm.ac.id/wp-content/uploads/sites/442/2017/11/baganbaru-1-e1620403826217-1024x806.jpg'
        src='https://cimsa.fk.ugm.ac.id/wp-content/uploads/sites/442/2012/10/Screen-Shot-2016-08-09-at-9.54.15-AM-e1620409716713.png'
        style={{ width: '100%', height: 'auto' }}
      />
      <h3
        style={{
          fontWeight: 'bold',
          color: 'white',
          background: 'red',
          marginTop: '40px',
        }}
      >
        EXECUTIVE BOARD
      </h3>
      <Row className='row-cols-1 row-cols-md-3 g-4 justify-content-center'>
        {officials[period].map((official, index) => (
          <Col key={index}>
            <Card>
              <img
                src={official.picture}
                className='card-img-top'
                alt={official.name}
              />
              <CardBody>
                <CardTitle as='h3' style={{ color: 'red', fontWeight: 'bold' }}>
                  {official.name}
                </CardTitle>
                <CardText as='h5'>{official.position}</CardText>
                <center>
                  <hr style={{ width: '90%' }} />
                </center>
                <CardText>
                  <a
                    href={`mailto:${official.email}`}
                    className='text-decoration-none'
                  >
                    {official.email}
                  </a>
                </CardText>
              </CardBody>
            </Card>
          </Col>
        ))}
      </Row>
      <h3
        style={{
          fontWeight: 'bold',
          color: 'white',
          background: 'red',
          marginTop: '40px',
        }}
      >
        SUPPORTING DIVISION COORDINATOR
      </h3>
      <Row className='row-cols-1 row-cols-md-3 g-4 justify-content-center'>
        {officials[period].map((official, index) => (
          <Col key={index}>
            <Card>
              <img
                src={official.picture}
                className='card-img-top'
                alt={official.name}
              />
              <CardBody>
                <CardTitle as='h3' style={{ color: 'red', fontWeight: 'bold' }}>
                  {official.name}
                </CardTitle>
                <CardText as='h5'>{official.position}</CardText>
                <center>
                  <hr style={{ width: '90%' }} />
                </center>
                <CardText>
                  <a
                    href={`mailto:${official.email}`}
                    className='text-decoration-none'
                  >
                    {official.email}
                  </a>
                </CardText>
              </CardBody>
            </Card>
          </Col>
        ))}
      </Row>
    </div>
  );
}
