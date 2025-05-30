import { css } from '@emotion/react';
import { Carousel, Col, Row } from 'react-bootstrap';

export default function HeroSection({ name, description, images }) {
  return (
    <Row
      as='section'
      data-aos='fade'
      data-aos-once='true'
      data-aos-duration='1200'
      xs={1}
      lg={2}
      css={css`
        display: flex;
        justify-content: center;
        padding: 2%;
        background: white;
        box-shadow: 8px 8px 8px rgba(0, 0, 0, 0.4);
        border-radius: 20px;
      `}
    >
      <Col>
        <h1
          data-aos='fade-right'
          data-aos-once='true'
          data-aos-duration='1200'
          className='display-4 fw-bold text-center'
          css={css`
            margin-top: 10px;
            @media (min-width: 992px) {
              margin-top: 0;
            }
          `}
        >
          <b>{name}</b>
        </h1>
        <hr style={{ borderWidth: '3px', opacity: 1 }} />
        <p
          data-aos='fade-up'
          data-aos-once='true'
          data-aos-duration='1200'
          style={{ color: 'black' }}
        >
          {description}
        </p>
      </Col>
      <Col>
        <Carousel
          data-aos='zoom-in'
          data-aos-once='true'
          data-aos-duration='1200'
          css={css`
            overflow: hidden;
            /* width: 1000px; */
            border-radius: 20px;
            /* flex-grow: 2; */

            @media (min-width: 992px) {
              border-radius: 24px;
            }
          `}
        >
          {images.map((image, i) => (
            <Carousel.Item key={i}>
              <img
                alt={`${name} image slide-${i + 1}`}
                css={css`
                  width: 100%;
                  object-fit: cover;
                  height: 400px;
                  border-radius: 20px;
                `}
                src={image}
              />
            </Carousel.Item>
          ))}
        </Carousel>
      </Col>
    </Row>
  );
}
