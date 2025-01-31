import { css } from '@emotion/react';
import { Card, CardBody, CardText, CardTitle, Col, Row } from 'react-bootstrap';
import { getOnHoverAnimationCss } from '../../utils';

export default function OrganizationStructureContent({ official }) {
  return (
    <div className='text-center'>
      <h2
        data-aos='zoom-out'
        data-aos-duration='1200'
        data-aos-once='true'
        className='display-6'
        style={{ color: 'red', fontWeight: 'bold' }}
      >
        CIMSA ULM OFFICIALS
      </h2>
      <h4
        data-aos='zoom-in'
        data-aos-duration='1200'
        data-aos-once='true'
        style={{ marginBottom: '14px' }}
      >{`${official.year}—${Number(official.year) + 1}`}</h4>
      <center>
        <hr style={{ width: '40%' }} />
      </center>
      <img
        data-aos='fade'
        data-aos-duration='1200'
        data-aos-once='true'
        alt='Cimsa ULM Officials'
        // src='https://cimsa.fk.ugm.ac.id/wp-content/uploads/sites/442/2017/11/baganbaru-1-e1620403826217-1024x806.jpg'
        // src='https://cimsa.fk.ugm.ac.id/wp-content/uploads/sites/442/2012/10/Screen-Shot-2016-08-09-at-9.54.15-AM-e1620409716713.png'
        src={official.poster}
        style={{ width: '100%', height: 'auto' }}
      />
      {official.divisions.map((division, i) => (
        <section
          key={i + 1}
          data-aos='fade-up'
          data-aos-duration='1200'
          data-aos-once='true'
        >
          <h3
            style={{
              fontWeight: 'bold',
              color: 'white',
              background: 'red',
              marginTop: '40px',
            }}
          >
            {division.name}
          </h3>
          <Row className='row-cols-1 row-cols-md-3 g-4 justify-content-center'>
            {division.members.map((member, i) => (
              <Col
                key={i + 1}
                data-aos='fade'
                data-aos-duration='1200'
                data-aos-once='true'
              >
                <Card
                  css={css`
                    ${getOnHoverAnimationCss(1.024)}
                  `}
                >
                  <img
                    src={member.image}
                    className='card-img-top'
                    alt={member.name}
                  />
                  <CardBody>
                    <CardTitle
                      as='h3'
                      style={{ color: 'red', fontWeight: 'bold' }}
                    >
                      {member.name}
                    </CardTitle>
                    <CardText as='h5'>{member.position}</CardText>
                    <center>
                      <hr style={{ width: '90%' }} />
                    </center>
                    <CardText>
                      <a
                        href={`mailto:${member.email}`}
                        className='text-decoration-none'
                      >
                        {member.email}
                      </a>
                    </CardText>
                  </CardBody>
                </Card>
              </Col>
            ))}
          </Row>
        </section>
      ))}
    </div>
  );
}
