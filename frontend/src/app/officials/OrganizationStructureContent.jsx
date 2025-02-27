import { css } from '@emotion/react';
import {
  Card,
  CardBody,
  CardText,
  CardTitle,
  Carousel,
  Col,
  Row,
} from 'react-bootstrap';
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
      <Carousel
        data-aos='fade'
        data-aos-once='true'
        data-aos-duration='1200'
        variant='dark'
        css={css`
          overflow: hidden;
          border-radius: 20px;

          @media (min-width: 992px) {
            border-radius: 24px;
          }
        `}
      >
        {official.posters.map((poster, i) => (
          <Carousel.Item key={i + 1}>
            <img
              css={css`
                width: 100%;
                object-fit: contain;
                height: 80vw;
                border-radius: 20px;

                @media (min-width: 992px) {
                  height: 1200px;
                  border-radius: 24px;
                }
              `}
              alt={`Cimsa ULM Officials Poster ${i + 1}`}
              src={poster.url}
            />
          </Carousel.Item>
        ))}
      </Carousel>
      {/* <img
        data-aos='fade'
        data-aos-duration='1200'
        data-aos-once='true'
        alt='Cimsa ULM Officials'
        src={official.poster}
        style={{ width: '100%', height: 'auto' }}
      /> */}
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
          <Row className='row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 justify-content-center'>
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
                    style={{
                      objectFit: 'cover',
                      width: '100%',
                      height: '428px',
                    }}
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
